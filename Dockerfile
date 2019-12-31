## Build frontend

FROM node:11-alpine as front-end

WORKDIR /build/temp/forex-console

COPY ./forex-console /build/temp/forex-console
COPY ./forex-console/docker /build/temp/forex-console

RUN chmod +x /build/temp/forex-console/build.docker.sh && /build/temp/forex-console/build.docker.sh

## Build backend

FROM maven:3.6.1-jdk-11-slim AS forex_backend_build

ARG PROFILE

WORKDIR /forex_backend

COPY ./ /forex_backend

RUN mvn verify clean --fail-never
	
RUN echo '### Build forex-backend jar file with profile ' $PROFILE \
	&& mvn clean install -DskipTests -P $PROFILE

## Run
	
FROM openjdk:11

WORKDIR /forex

COPY --from=front-end \
		/build/temp/forex-console/public \
		/forex/frontend

COPY --from=forex_backend_build \
		/forex_backend/forex-manager/target/forex-manager-0.0.1-SNAPSHOT.jar \
		/forex/forex_server.jar

		
COPY --from=forex_backend_build \
		/forex_backend/docker/wait-for-it.sh \
		/forex/wait-for-it.sh
		
RUN chmod +x ./wait-for-it.sh

ENTRYPOINT ["./wait-for-it.sh", "forex-postgres:5432", "--strict" , "--timeout=300", "--", "java" ,"-jar", "forex_server.jar"]
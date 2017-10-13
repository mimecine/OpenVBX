# Docker

Docker allows you to run OpenVBX easily in a containerized environment, eliminating the need for you to install Apache, Mysql, and PHP on your local development machine.  If you're unfamiliar with how docker works, [check it out](https://www.docker.com/get-docker)!

### Prerequisites

To follow any of the instructions, you must have docker and docker-compose installed. Depending your operating system the instructions can vary. [Mac](https://docs.docker.com/docker-for-mac/install/), [Windows](https://docs.docker.com/docker-for-windows/install/), [Ubuntu](https://docs.docker.com/engine/installation/linux/docker-ce/ubuntu/) are common OS. The OSX installer will also installed docker compose, if you're not sure if you have compose installed, [follow these instructions](https://docs.docker.com/compose/install/).

Test if docker and docker-compose are installed by typing the following into a terminal.

`$ docker -v`

`$ docker-compose -v`

If you do not see a "command not found" error, you're good to go.

### Configuration

There are parts of the application that are configured in docker specific files. You *MUST* edit these values if you want your application to be secure and be specific to your environment.

#### docker-compose.yml

In the `db` service section of the `docker-compose.yml` file there is a section for mysql database configuration. These variables are what it will create your database with. These are the values mysql will use to configure the OpenVBX database.  You *should* change these values to what you plan on setting in your OpenVBX install process.  

```yml
    environment:
      MYSQL_ROOT_PASSWORD: root_password
      MYSQL_DATABASE: OpenVBX
      MYSQL_USER: openvbxuser
      MYSQL_PASSWORD: asdf
```

### Running

To run the OpenVBX stack you will use `docker-compose` to start the Apache/PHP service and the MySQL service simulatenously and network them together. From the project root directory run the following command.

`docker-compose up`

This will pull down and build the apache/php container and set it up to run OpenVBX and pull down the MySQL container and configure it based on the credentials provided in the compose file.

### Installing OpenVBX

One major caveat when configuring OpenVBX comes up when going through the installer web interface. When you configure your database, you need to give it a `host` field in the form.  In this field you MUST put in `db` as the hostname. This is set on the container and it maps to the MySQL container. Pretty nifty and magical all in one.
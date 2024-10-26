<h1>Sample-blog</h1>

This is a small Laravel app made with CRUD in mind. It allows creation of posts and comments. Factory has been provided for seeding database with random content.
At first it used Alpine.js, but it was replaced with Vue. Taillwind is used to provide basic styling, including light and dark mode.
The current functionality is as follows:


<ul>
	<li>Users can register and log in</li>
	<li>Any user can list and view posts and comments inside.</li>
	<li>Authenticated users can create posts and comments.</li>
	<li>Only author of comment or post author can delete comments.</li>
	<li>Only post author can edit or remove the post</li>
</ul>

Setting up instructions, based around WSL and Docker:
<ol>
	<li>Ensure that Docker is installed and set up</li>
	<li>Clone repo. If needed, rename main folder to change name</li>
	<li>Get .env file. Contents of .env.example provide good scaffolding. Modify it as required.</li>
	<li>Use command 'sail artisan key:generate' to generate app key.</li>
	<li>Check contents of docker-compose.yml and modify services and other variables if required.</li>
	<li>Run docker-compose up -d to bring up container.</li>
        <li>If there are warnings about missing WWW variables, add those in .env file. Usually sail or 1000 works.</li>
	<li>Either enter container console using docker-compose exec <i>appname</i> bash and run composer install, or run docker-compose exec <i>appname</i> composer install.</li>
	<li>If mysql (if used) stops, reporting existing socket conflict, change socket location in docker-compose.yml. Either use MYSQL_UNIX_ADDR: in mysql environment section /var/run/mysqld/mysqld.sock or command: --socket=/var/run/mysqld/mysqld.sock at end of mysql section.
	<li>Stop the container using docker-compose down, then rebuild them either using docker-compose up --build or using ./vendor/bin/sail up --build. Alias can be made to shorten the use of sail command.</li>
	<li>Run migrations. For Sail, it would be sail artisan migrate. If sail artisan expects different service name, add APP_SERVICE=app-name to the .env with actual name of the service</li>
	<li>Seed database with sail artisan db:seed.</li>
	<li>Install vite using sail npm install. After installation, run sail npm run dev to start vite development server.</li>
</ol>

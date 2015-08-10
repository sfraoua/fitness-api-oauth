set :application, 'workout'
set :repo_url, 'https://github.com/sfraoua/workout.git'

set :ssh_user, 'tannana'
server '212.129.20.99', user: fetch(:ssh_user), roles: %w{web app db}

set :scm, :git

set :format, :pretty
set :log_level, :debug
set :use_sudo, true

set :composer_install_flags, '--prefer-dist --no-interaction --optimize-autoloader'


set :keep_releases, 3

set :bower_flags, '--quiet --allow-root'

set :writable_dirs, ["#{release_path}/app/cache", "#{release_path}/app/logs"]

set :deletable_dirs, ["#{release_path}", "#{release_path}"]


#=========== SF ==============
set :symfony_env,  "prod"

# Symfony application path
set :app_path,              "app"

# Symfony web path
set :web_path,              "web"

# Symfony log path
set :log_path,              fetch(:app_path) + "/logs"

# Symfony cache path
set :cache_path,            fetch(:app_path) + "/cache"

# Symfony config file path
set :app_config_path,       fetch(:app_path) + "/config"

# Controllers to clear
set :controllers_to_clear, ["app_*.php"]

# Files that need to remain the same between deploys

set :linked_files, %w{app/config/parameters.yml}
set :linked_dirs, %w{app/logs web/uploads}

set :shared_children,     ["app/logs", "web/uploads"]

# Dirs that need to be writable by the HTTP Server (i.e. cache, log dirs)
set :file_permissions_paths,         [fetch(:log_path), fetch(:cache_path)]

# Name used by the Web Server (i.e. www-data for Apache)
set :webserver_user,        "www-data"

# Method used to set permissions (:chmod, :acl, or :chgrp)
set :permission_method,     :acl

# Execute set permissions
set :use_set_permissions,   true



after 'deploy:updated', 'cache:fix_file_permissions'
after 'deploy:updated', 'bower:install'
after 'deploy:updated', 'workout:database'
after 'workout:database', 'cache:fix_file_permissions'
after 'deploy:finishing', 'app:copy_htaccess'
after 'deploy:finishing', 'deploy:cleanup'
after 'deploy:cleanup', 'cache:create_cache_folder'

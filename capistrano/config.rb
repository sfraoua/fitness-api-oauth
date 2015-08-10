set :application, 'workout'
set :repo_url, 'https://github.com/sfraoua/workout.git'

set :ssh_user, 'tannana'
server '212.129.20.99', user: fetch(:ssh_user), roles: %w{web app db}

set :scm, :git

set :format, :pretty
set :log_level, :debug
set :use_sudo, true

set :composer_install_flags, '--prefer-dist --no-interaction --optimize-autoloader'


set :keep_releases, 4

set :bower_flags, '--quiet --allow-root'

set :writable_dirs, ["#{release_path}/app/cache", "#{release_path}/app/logs"]

set :deletable_dirs, ["#{release_path}", "#{release_path}"]


#=========== SF ==============
# Symfony environment
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

# Dirs that need to remain the same between deploys (shared dirs)
set :linked_dirs,           [fetch(:log_path), fetch(:web_path) + "/uploads"]

set :shared_children,     ["app/logs", "web/uploads"]


# Dirs that need to be writable by the HTTP Server (i.e. cache, log dirs)
set :file_permissions_paths,         [fetch(:log_path), fetch(:cache_path)]

# Name used by the Web Server (i.e. www-data for Apache)
set :file_permissions_users, ['tannana', "www-data", "tanna"]

# Name used by the Web Server (i.e. www-data for Apache)
set :webserver_user,        "tannana"

# Method used to set permissions (:chmod, :acl, or :chgrp)
set :permission_method,     false

# Execute set permissions
set :use_set_permissions,   false

# Symfony console path
set :symfony_console_path, fetch(:app_path) + "/console"

# Symfony console flags
set :symfony_console_flags, "--no-debug"

# Assets install path
set :assets_install_path,   fetch(:web_path)

# Assets install flags
set :assets_install_flags,  '--symlink'

# Assetic dump flags
set :assetic_dump_flags,  ''

fetch(:default_env).merge!(symfony_env: fetch(:symfony_env))



before 'deploy:updated', 'cache:fix_file_permissions'
after 'deploy:updated', 'bower:install'
after 'deploy:updated', 'workout:database'
after 'deploy:finishing', 'app:copy_htaccess'
after 'deploy:cleanup', 'cache:fix_file_permissions'

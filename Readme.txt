Run the following commands in your terminal to setup the project

-- You must have the LAMP installed on your system

1.  git clone https://github.com/Bashar-Ahmed/Library.git
2.  cd Library
3.  bash run.sh
    This will install composer,
    then open your virtual host config file 
    where you need to copy paste the following code 
    and type in the path to your cloned repository's public directory :
        
        <VirtualHost *:80>
            ServerName library.local
            #Enter Path Here
            DocumentRoot /path____________________      
            #Enter Path Here
            <Directory /path____________________ >     
                Options -Indexes -MultiViews
                Allowoverride all
                Require all granted
                <IfModule mod_rewrite.c>
                    RewriteEngine On

                    # Redirect Trailing Slashes If Not A Folder...
                    RewriteCond %{REQUEST_FILENAME} !-d
                    RewriteRule ^(.*)/$ /$1 [L,R=301]

                    # Handle Front Controller...
                    RewriteCond %{REQUEST_FILENAME} !-d
                    RewriteCond %{REQUEST_FILENAME} !-f
                    RewriteRule ^ index.php [L]
                </IfModule>


            </Directory>
            ErrorLog ${APACHE_LOG_DIR}/library.error.log
            LogLevel warn
            CustomLog ${APACHE_LOG_DIR}/library.access.log combined
        </VirtualHost>

    Save and Close this file
    Now, your system hosts file will open
    Insert the following line to the end of the file :

        127.0.0.1      library.local

    Save and Close this file

Your setup is now complete
Run "library.local/" on your browser to view the project.
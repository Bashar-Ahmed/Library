Run the following commands in your terminal to setup the project

_You must have the LAMP installed on your system_

1.  >git clone https://github.com/Bashar-Ahmed/Library.git
2.  >cd Library
3.  >bash run.sh

    This will install composer,<br>
    then open your virtual host config file<br>
    where you need to copy paste the following code<br>
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

    Save and Close this file<br>
    Now, your system hosts file will open<br>
    Insert the following line to the end of the file :

        127.0.0.1      library.local

    Save and Close this file

Your setup is now complete<br>
Run [Central Library](library.local/) or "library.local/" on your browser to view the project.
# LNCD contact form
php script embedded in wordpress using iframes.


see https://lncd.pitt.edu/wiki/doku.php?id=admin:website:wordpress:contactform

## Setup

EWI access is the same as for wordpress. VPN portal-palo.pitt.edu and sftp ewi-prod.cssd.pitt.edu (windows server with unusual/old ssh settings)

```
sudo openconnect --protocol=gp portal-palo.pitt.edu --csd-wrapper=/usr/lib/openconnect/hipreport.sh
sftp -o 'KexAlgorithms=+diffie-hellman-group1-sha1,diffie-hellman-group-exchange-sha1' -o 'HostKeyAlgorithms=+ssh-dss' -o 'Ciphers=aes256-cbc' foran@ewi-prod.cssd.pitt.edu
```


# bluespice/config-mw/overrides (Installer for BlueSpice 3 on top of MediaWiki 1.31)

This repo contains all the implementation _and_ resources/assets that are required for the installer UI
```
 # get fork of mediawiki
 git clone https://github.com/hallowelt/mediawiki bluespice3
 cd bluespice3
 # switch to 1.31
 git checkout REL1_31
 cd mw-config
 # get installer
 rm -rf overrides
 git clone https://github.com/hallowelt/bluespice-config-mw-overrides overrides
 cd ..
 # init submodules
 git submodule update --init --recursive
 # run composer
 composer update
 echo "ready for install with WebInstaller"
```


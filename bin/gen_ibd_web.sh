#!/bin/sh

if [ -e ibd-web ]; then
    echo "File ibd-web exists already, abort operation.."
    exit 0
fi

cp /usr/bin/ibd-web .
patch ibd-web ibd-web.diff

#cd $HOME/IBD/config/
#patch 

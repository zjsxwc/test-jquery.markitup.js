#!/bin/bash
WORK_DIR=`dirname $0`/
php -S 0.0.0.0:32123 -t $WORK_DIR
#HostServerAddr = "10.0.2.2"
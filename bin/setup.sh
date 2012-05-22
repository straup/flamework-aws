#!/bin/sh

if test $OSTYPE = "FreeBSD"
then
    WHOAMI=`realpath $0`
elif test $OSTYPE = "darwin"
then
    WHOAMI=`python -c 'import os, sys; print os.path.realpath(sys.argv[1])' $0`
else
    WHOAMI=`readlink -f $0`
fi

WHEREAMI=`dirname $WHOAMI`
AWS=`dirname $WHEREAMI`

PROJECT=$1
YMD=`date "+%Y%m%d"`

echo "copying application files to ${PROJECT}"
cp ${AWS}/www/*.php ${PROJECT}/www/

echo "copying templates to ${PROJECT}"
cp ${AWS}/www/templates/*.txt ${PROJECT}/www/templates/

echo "copying library code to ${PROJECT}"
cp ${AWS}/www/include/*.php ${PROJECT}/www/include/
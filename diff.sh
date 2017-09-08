#!/usr/bin/env bash
wget https://www.outreachy.org/apply/rounds/2017-december-march/ -O /home/ubuntu/diff/index.html

DIFF=$(diff /home/ubuntu/diff/index.html /home/ubuntu/diff/index.html_) 
if [ "$DIFF" != "" ] 
then
    echo "The directory was modified"
    diff /home/ubuntu/diff/index.html /home/ubuntu/diff/index.html_ > /home/ubuntu/diff/diff
    /usr/bin/php /home/ubuntu/diff/diff.php
else
    echo "Not modified"
    echo "$DIFF"
fi
#rm index.html_
mv /home/ubuntu/diff/index.html /home/ubuntu/diff/index.html_

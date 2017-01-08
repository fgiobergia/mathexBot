#!/bin/bash
./mathtex.cgi ${1// /%20} -o $2
if [ ! -f ${2}.gif ]; then
    exit 1
fi

size=(`identify -format "%w %h" "${2}.gif"`)
width=$[${size[0]} + 30] # add some padding
height=$[${size[1]} + 30]
convert ${2}.gif -background white -gravity center -extent ${width}x${height} images/${2}.jpg
rm ${2}.gif

# delete older files
touch --date="10 minutes ago" .tmp # prepare comparison file (to use with find -newer)
find images/ -not -newer .tmp -type f -and -not -name "*error.jpg" -delete # delete all files older than 10 minutes (but for error.jpg)
rm .tmp

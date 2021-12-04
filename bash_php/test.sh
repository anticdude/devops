#variable declaration
now=$(date)
n="5"

#print value
echo "Current date: $now"

#if else condition
if [ $n > 2 ]
then
	    echo "good Night"
    else
	        echo "goodmorn"
fi

#accept value from user
echo "select 1 or 2"
read number

if [ $number = 1 ]
then
	     echo "hi"
     else 
	          echo "by"
fi

a=0
while [ $a -lt 10 ]
do 
	     echo $a
	          a=`expr $a + 1`
	  done

	  pwd
	  

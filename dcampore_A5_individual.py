#Dan Camporeale

#Group 7

#1:  When using strftime what is the placeholder that will display the full name of the month

#"%A"


#2: Write an algorithm for step 3

#import dateitme
#make today the indicator
#format the date (year/month/day)
#now make sure you switch the formatting, so the day shows
#now you can group items sold on the weekend
#print items for audience

#3: Write a program that reads in the information from a file called ShopRecords.csv
# Display all of the items that were sold on a weekend

import datetime, csv

records = csv.DictReader(open("ShopRecords.csv","r"))

for record in records:
    date = datetime.date.today()
    
    fixed_date = record["Date"].split("/")
    
    weekend = datetime.date(int(fixed_date[2]), int(fixed_date[0]), int(fixed_date[1]))
    
    if weekend.strftime("%A") == "Saturday" or weekend.strftime("%A") == "Sunday":
        
        print(record["Item"])

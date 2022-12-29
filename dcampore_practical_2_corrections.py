#import urllib.request, re

import urllib.request, re

#open up page
page = urllib.request.urlopen ("https://sice.indiana.edu/news/index.html")

#read page
contents = page.read().decode(errors="replace")

#close page
page.close()

#find all headlines
headlines = re.findall('(?<=<div class="head5">).+?(?=</div>)',contents , re.DOTALL)

#print what website you are looking into (in this case its indiana.edu)
print("Searching: https://sice.indiana.edu/news/index.html")


#create for loop to go through content
for headline in headlines:

    #print all headlines on page
    print(headline,
            "\n")
print()    

print("Searching: https://sice.indiana.edu/news/index.html")

#create variable for user input
user = input("Please enter a date to search for: ")

find_date = re.findall('(?<=<div class="small meta">), user ,(?=</div>)',contents , re.DOTALL)
#create for loop
for date in headlines:

    #create if statement to test if date is in headlines
    if user in date:

        #print matches
        print (date,
                "\n")


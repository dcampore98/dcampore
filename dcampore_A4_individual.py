#Dan Camporeale

#Group 7

#1: Where can you find the Standard Documentation for Python?
# You can find it through using the help button above

#2:
#import os
#need to include an input, so that we can get data for the directory
#go to home directory
#change path to new directory that user had just put in 
#search for contents/files in directory
#find conents in the direcotry that has the name draft
#rename draft file --> final

#3:

import os
import datetime

# make a variable for the date
today = datetime.datetime.today()
day = today.strftime("%B %d, %Y")  # format the date as a string

folder = os.getcwd()  # get the current working directory

# create input for new directory
new_dir = input("Enter a new directory: ")

new_folder = os.path.join(folder, new_dir)  # join the new directory to the current working directory

os.chdir(new_folder)  # change the current working directory to the new directory

# get a list of all files in the new directory
files = os.listdir(new_folder)

# loop through each file in the new directory
for file in files:
    # check if the file name contains the string "draft"
    if "draft" in file:
        # rename the file by replacing "draft" with "final"
        new_file = os.rename(file, file.replace("draft", "final"))
        print(file.replace("draft", "final"))  # print the new file name
        print("Edited on: ", day)  # print the date


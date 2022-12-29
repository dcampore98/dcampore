#Dan Camporeale
#Group 7

#Homework 6

#1
#Answer the question: what is the Python regular expression pattern that would match a hex color (Links to an external site.) code.
#(for example, the pattern that would match an email address is '[\w.-]+@[\w.-]')

# "#[\w{6}]"

#2
#Write an algorithm for step 3.
#As part of your algorithm, be sure to describe the pattern you're using to find the win/loss result for each game.

#import re and urllib.request
#open website
#read contents of website
#create empty list for results
#save website content
#close website
#re.findall will find results of games from content above
#separate wins and losses from results
#print outcome e.g Wins : and Losses :

#3
#Write a program that looks at the source of http://cgi.soic.indiana.edu/~dpierz/mbball.html (Links to an external site.)(a copy of the IU men's basketball team record page).
#Use regular expressions to find all the games IU has played in this year and calculate the total number of wins and losses (including exhibition games)

#import
import re, urllib.request

#open website
ope_n = ("http://cgi.soic.indiana.edu/~dpierz/mbball.html")

#read content
content = ope_n.read()

#create empty list for wins and losses
win = []
loss = []

#save and close content from website
ope_n.close()

#use re.findall for results
results = re.findall('(?<div class="schedule_game_results"><div>').*, content)

#separate wins and losses (you can only have wins or losses)
for result in results:
    if "W" in result:
        win + 1
    else:
        loss + 1

#display results
print("Wins: ", win)
print("Losses: ", loss)

#Bonus [10 pts]. Extend your code from part 3 to also calculate the total difference in points scored in all the games
#(a game that finished 68-71 would have a difference of 3 points, 85-52 a difference of 33 points etc)

#create difference variable
diff = 0

#create score variables
x = ?

y = ?

#test and see if the result on the left is higher or lower than the right
#if number on left is larger than right you add from 0
#if number on left is smaller than right you minus from 0

for result in results:
    if [x] < [y]:
    diff - (int[x - y])

    else:
    diff + (int[x + y])

print("Total Difference: ", diff)
    
        
    












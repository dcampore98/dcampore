from tools import *

text_file = open("colors.txt" , "r")
lines = text_file.readlines()
text_file.close()

#remove \n for each entry
for i in range(len(lines)):
    lines[i] = lines[i].strip()

#create an empty dictionary

new_dict = {}

for line in lines:
    if line in new_dict:
        new_dict[line] += 1
    else:
        new_dict[line] = 1

print(new_dict)


table_print(["Color", "Number"], new_dict.items(), 10)
    

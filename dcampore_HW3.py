import random

# Get a list of words from the user
words = input("Please enter a list of words separated by spaces: ")

# Split the list of words into a Python list
word_list = words.split()

# Generate a random movie title by selecting three random words from the list
title = random.choice(word_list) + " " + random.choice(word_list) + " " + random.choice(word_list)

# Print the generated movie title
print("Currently playing: " + title)


    
    


import random

def word_guess():
    # Choose a random word from a list of words
    words = ["apple", "banana", "orange", "grape", "strawberry"]
    word = random.choice(words)
    word_lst = list(word)

    # Create a blank list to store the correct guesses
    blnk_lst = ['_' for _ in word_lst]

    # Introduce the game
    print("Welcome to word guessing game")

    count = 0
    
    while count < 5:
        # Make sure the user guesses letters, we don't want numbers
        guess = input("Guess a letter... ")
        if len(guess) == 1:
            if guess not in 'abcdefghijklmnopqrstuvwxyz':
                print("You didn't guess a letter, try again")
            elif guess in word:
                for i, letter in enumerate(word_lst):
                    if guess == letter:
                        blnk_lst[i] = guess
                print("Guess = Correct")
            else:
                count += 1
                print("Guess = wrong", " You attempted", count, " times")
        else:
            print("Only guess 1 letter at a time")
            print()
        if blnk_lst == word_lst:
            print("Well done!")
            break
        else:
            print("Word: ", "".join(blnk_lst))
            
    print("The secret word is: ", word)

word_guess()


#2 Intorudcing the pokemon game from last week, we already established the algorithm



import random

print("Welcome")

# Introduce the game to the user

option = ["fire", "water", "grass"]

# Establish the categories

computer_option = random.choice(option)

# Get the computer to generate its pick

user = input("Fire, water, or grass? You pick: ")

# Get user input

if user == computer_option:
    print("Same option, you draw")

# Make the rules for all the picks

elif user == "fire":
    if computer_option == "grass":
        print("VICTORY!")
    else:
        print("You lose this one")

elif user == "water":
    if computer_option == "fire":
        print("VICTORY!")
    else:
        print("You lose this one")

elif user == "grass":
    if computer_option == "water":
        print("VICTORY!")
    else:
        print("You lose this one")

# Make sure they only pick from those options, if they don't remind them, they can't just make up stuff
# Rules are rules
else:
    print("Wrong choice, pick one of the 3 options")




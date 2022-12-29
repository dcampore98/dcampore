#5.39

# Define exclamation, also takes input
def exclamation(word):
    new_word = ""
    # For loop uses value from input
    for char in word:
        if char in "AaEeIiOoUu":
            new_word += char * 4
        else:
            new_word += char
    new_word += "!"
    return new_word
print(exclamation("argh"))
print(exclamation("hello"))




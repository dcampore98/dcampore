def vowel_count(sentence):
    # Initialize variables to keep track of the vowel counts
    a_count = 0
    e_count = 0
    i_count = 0
    o_count = 0
    u_count = 0

    # Loop through each letter in the sentence
    for letter in sentence:
        # Convert the letter to lowercase
        lower_letter = letter.lower()
        # Increment the appropriate vowel count
        if lower_letter == 'a':
            a_count += 1
        elif lower_letter == 'e':
            e_count += 1
        elif lower_letter == 'i':
            i_count += 1
        elif lower_letter == 'o':
            o_count += 1
        elif lower_letter == 'u':
            u_count += 1

    # Print the results
    print("a, e, i, o, and u appear, respectively", a_count, ",", e_count, ",", i_count, ",", o_count, ",", u_count)

# Get a sentence from the user
sentence = input("Please enter a sentence: ")

# Count the vowels in the sentence
vowel_count(sentence)


   
         


#Dan Camporeale
#Group 7

#HW7
# import element tree and allow xml to work
import xml.etree.ElementTree as ET, re

# create variable for library file
root = ET.parse("library.xml")

# create iteration for books (second element) in file
elements = root.findall("book_id")

# Q1

# create function display_book
def display_book(comp_book):

    # create for loop to go through elements in file
    for book in elements:

        # display Book Id, Title, Author, Price for each book id
        print("Book ID:", book.find("book_id").text,
              "Title:", book.find("title").text,
              "Author:", book.find("author").text,
              "Price:", book.find("price").text,
              "\n")

print()

# Q2

# find all publishing dates in file
december_content = root.findall("book_id/publish_date")

# use for loop to search for all cases of december publishing
for december in december_content:
    
    # use if to express true/false vs the data in file
    if december.text[5:] == "-12":

        # create query (##-12-)
        # print results for december publishing
        book = december.find("..")
        print("Title:", book.find("title").text,
              "Author:", book.find("author").text,
              "Price:", book.find("price").text,
              "\n")

# present the Author, Title, Price for each december published work
print()

# Q3

# print all genres in library file

# find all genres
genres = root.findall("book_id/genre")

# use for loop to go through all data in file
for genre in genres:

    # print all genres in file
    print(genre.text)








            
    
    
    
    

    


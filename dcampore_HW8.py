# 9.20
import tkinter
import random
from tkinter import *

class Application(Frame):
    # Class constructor
    def __init__(self, master):
        Frame.__init__(self, master)
        self.grid()
        self.create_widgets()

        # Set a random number (0-9) to the variation number
        self.num = str(random.randrange(9))

    # Create widget method
    def create_widgets(self):
        # Create label and position it
        self.label = Label(self, text="Enter your guess: ")
        self.label.grid(row=0, column=2, sticky=N)

        # Create entry and set positioning off the entry
        self.entry = Entry(self, width=30)
        self.entry.grid(row=1, column=1, columnspan=4, sticky=W)

        # Create a button that lets user enter number
        self.button = Button(self, text="Enter", command=self.guess)
        self.button.grid(row=2, column=2, sticky=W)

    # Create a method
    def guess(self):
        # Test to see if guess number is same as random number
        if self.entry.get() != self.num:
            self.label["text"] = "Try Again"
            self.entry.delete(0, END)
        else:
            print("The number was", str(self.num), "you guessed correctly")

# Main
root = Tk()
root.title("Basic Application Class GUI")
root.geometry("400x200")
root.resizable(width=FALSE, height=FALSE)

app = Application(root)
root.mainloop()

# 9.21

import tkinter
import random
from tkinter import *

class Application(Frame):
    # Create constructor
    def __init__(self, master):
        Frame.__init__(self, master)



        



















        











            
    

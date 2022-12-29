#! /usr/bin/env python3

#import cgi
import cgi


print('Content-type: text/html\n')

#You need to add your own code here!

#variables for assignment will be up here 
letter_picked = form.getfirst("letter","N/A")
letter_guess = form.getfirst("guess","N/A")

pick_it = ""
guess_it = ""

form = cgi.FieldStorage()
#what are we looking into 

html = """

<!doctype html>

<html>
<head>
  <meta charset="utf-8">
  <title>Alphabet Practice</title>
</head>

  <body>
    <img src="c.jpg">
  <h2>Sorry, the correct response was Chewie and C-3PO</h2>
  <form method="post" action="pxqzj.cgi">
            <p>The letter:
            <select name="letter">
                <option>a</option>
                <option>b</option>
                <option>c</option>
                <option>d</option>
                <option>e</option>
                <option>f</option>
                <option>g</option>
                <option>h</option>
                <option>i</option>
                <option>j</option>
                <option>k</option>
                <option>l</option>
                <option>m</option>
                <option>n</option>
                <option>o</option>
                <option>p</option>
                <option>q</option>
                <option>r</option>
                <option>s</option>
                <option>t</option>
                <option>u</option>
                <option>v</option>
                <option>w</option>
                <option>x</option>
                <option>y</option>
                <option>z</option>
            </select>
            </p>
            <p>Is for: <input type="text" name="guess"></p>
        <button type="submit">Submit</button>
</form> 
  </body>
</html>

"""

#list created for the langauge of starwars
alphabet_language = ["a":"Ackbar", "b":"Bossk", "c":"Chewie and C-3PO", "d":"Dash Rendar", "e":"Ewoks", "f": "Fett", "g":"Greedo", "h":"Han Solo", 
			"i":"IG-88", "j":"Jabba", "k":"Kyle Katarn", "l":"Luke and Leia", "m":"Mara Jade", "n":"Nien Nunb", "o":"Obi-Wan", "p":"Palpatine",
				"q":"Quinlan Vos", "r":"R2D2", "s":"Storm Troopers", "t":"Thrawn", "u":"Ulic Qel-droma", "v":"Vader", "w":"Wedge", 
					"x":"Xizor", "y":"Yoda", "z":"Zuckuss"]
  

#create if statment to check if the letter chosen and letter guessed match 
if pick_it == guess_it:





print(html.format(guess = letter_guess, letter = letter_picked, my_rank = my_rank))

print(url)

#open webpage and print language
web_page = urllib.request.urlopen(url)
lines = web_page.read().decode(errors="replace")
web_page.close()

print(lines)




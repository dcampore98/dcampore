# Prompt the user to enter the four numbers
num1 = input("Enter the first number: ")
num2 = input("Enter the second number: ")
num3 = input("Enter the third number: ")
num4 = input("Enter the fourth number: ")

# Convert the input to numerical values
num1 = int(num1)
num2 = int(num2)
num3 = int(num3)
num4 = int(num4)

# Calculate the sum and the average
sum = num1 + num2 + num3 + num4
average = sum / 4

# Print the average
print("The average is:", average)

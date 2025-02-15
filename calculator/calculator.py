def add(a, b):
    return a + b

def subtract(a, b):
    return a - b

def multiply(a, b):
    return a * b

def divide(a, b):
    if b == 0:
        raise ValueError("Cannot divide by zero")
    return a / b

def main():
    print("Simple Calculator")
    print("Available operations:")
    print("1. Add")
    print("2. Subtract")
    print("3. Multiply")
    print("4. Divide")
    
    while True:
        try:
            choice = input("\nEnter operation number (1-4) or 'q' to quit: ")
            
            if choice.lower() == 'q':
                print("Goodbye!")
                break
                
            if choice not in ['1', '2', '3', '4']:
                print("Invalid choice. Please select 1-4 or 'q' to quit.")
                continue
                
            num1 = float(input("Enter first number: "))
            num2 = float(input("Enter second number: "))
            
            if choice == '1':
                result = add(num1, num2)
                print(f"{num1} + {num2} = {result}")
            elif choice == '2':
                result = subtract(num1, num2)
                print(f"{num1} - {num2} = {result}")
            elif choice == '3':
                result = multiply(num1, num2)
                print(f"{num1} * {num2} = {result}")
            elif choice == '4':
                try:
                    result = divide(num1, num2)
                    print(f"{num1} / {num2} = {result}")
                except ValueError as e:
                    print(f"Error: {e}")
                    
        except ValueError:
            print("Invalid input. Please enter valid numbers.")
        except KeyboardInterrupt:
            print("\nGoodbye!")
            break

if __name__ == "__main__":
    main()

import pyotp
import random

def generate(id):
    #128 bit is 8 HEX and 4 base32
    with open("users.txt", "a") as f:
        f.write(str("\n"+id))
    key = pyotp.random_base32(length=8)
    print("GENERATED KEY", key, "FOR USER", id)
    with open(id, "w") as f:
        f.write(key)

def validate(id, code):
    with open("users.txt", 'r') as f:
        for line in f:
            if line[-1:] == "\n":
                line = line[:-1]
            if line == id:
                with open(id, 'r') as k:
                    key = k.readline()
                totp = pyotp.TOTP(key)
                if int(code) == int(totp.now()):
                    print("CORRECT CODE", code, "FOR USER", id)
                    return True
                print("INVALID CODE", code, "FOR USER", id)
                return False
        print("NO SUCH USER:", id)
        return False



if __name__ == "__main__":
    while(True):
        msg = input("\nWRITE Gen or Val to generate or validate\n> ")
        if msg.lower()[0] == 'g':
            id = input("Generating key ... enter ID:\n> ")
            generate(id)
        else:
            print("Validation: write [id] [key]")
            info = input("> ")
            arr = info.split()
            validate(arr[0], arr[1])
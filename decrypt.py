import requests
import json

#Decrypt
def decrypt(key, n, ciphertext):
    #Unpack the key into its components
    #Generate the plaintext based on the ciphertext and key using a^b mod m
    plain = [chr((char ** key) % n) for char in ciphertext]
    #Return the array of bytes as a string
    return ''.join(plain)

url = 'https://api.thingspeak.com/channels/426518/fields/1?api_key=T1NYXI7RNC5PBWE9&results=2'
result = requests.get(url)
data=result.text
data=json.loads(data)
for i in data['feeds'] :
	data = i['field1']
	ciphertext=data.split('A')[1:-2]
	for i in range(len(ciphertext)):
		ciphertext[i] = int(ciphertext[i])
	public=data.split('A')[-2:]
	for i in range(len(public)):
		public[i] = int(public[i])

	key=public[0]
	n=public[1]


	plain_text = decrypt(key, n ,ciphertext)

	print(plain_text)
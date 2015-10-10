from flask import Flask, request, render_template #request is for handling requests. it is a special library that works with http requests. 


app = Flask(__name__)

tweets = []




@app.route("/") #if someone goes to the root of the function, route them to go bears. 
#for example -- when we go to google.com, google automatically says google.com/index.html or wtv, that means you get routed into index.html"""
def hello():
	#return "Go Bears!"
	#now we want it to return the website
	return app.send_static_file('index.html') #this function looks for the file name in the static folder. 

@app.route("/api/hakk", methods=["POST"]) #if someone comes and says i want to connect to api/hakk and they do it through 
#a post request, then use the request library to do the following thing ...
def receive_hakk():
	name = request.form['name']
	phone_number = request.form['phone_number']
	# tweets.append({'name': name,'hakk': hakk})
	tweets.append([name,phone_number])
	print(tweets)
	return "Success!"

@app.route('/q')
def show_tweets():
	return render_template('tweets.html', tweets=tweets)



if __name__ == "__main__":
	app.run(debug=True)

#127.0.0.1:5000 is also called localhost


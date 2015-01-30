# gettingToPhilosophy
This is my solution to the code challenge outlined below, showcased at http://aws910.com/gtp

Getting To Philosophy

Objective: Given a random Wikipedia URL, follow the first link on that page until you reach the Wikipedia page for Philosophy. The script should take a single Wikipedia link as input and print out the path taken to reach Philosophy. It should also print out the amount of hops it took to get to the page.

One hint: because not every single link will lead to Philosophy, think about defining a maximum number of hops.

Example input: 
php gettingToPhilosophy.php http://en.wikipedia.org/wiki/Free_content

Example output:
http://en.wikipedia.org/wiki/Free_content
http://en.wikipedia.org/wiki/Work_of_art
http://en.wikipedia.org/wiki/Aesthetic
3


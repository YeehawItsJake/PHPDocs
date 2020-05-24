# PHPDocs
Proof of concept. Only contains one file, index.php as it will connect to a remote MySQL server.
If you are directly importing, the 4 colums will be needed:
ID (Use alphanumerics, not just numbers)
title (This is the title of all your documents. Ex. How To Copypasta Like A King)
content (This should NOT contain any double quotes (") as that will mess with the scripting!)
createdBy (You can use this to implement a community docs page and find who created what document. If someone is signed in and submits new data, use $_SESSION['username'] > createdBy
dateCreated (No type is really needed, I used VARCHAR in my database.)

Have fun!
 


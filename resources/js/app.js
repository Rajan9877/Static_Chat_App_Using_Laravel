import './bootstrap';

// Create an event listener that will send a POST request to the
// server when the user clicks the button.
// document.querySelector('#submit-button').addEventListener(
//     'click',
//     () => window.axios.post('/button/clicked')
// );


// Subscribe to the public channel called "public-channel"
// Assuming you are listening for the event as you mentioned in your question
Echo.channel('public-channel')
    .listen('.button.clicked', (e) => {
        // Create a new message container
        var messageContainer = document.createElement('div');
        messageContainer.classList.add('message-container');

        // Create user and message elements
        var userElement = document.createElement('span');
        userElement.classList.add('user');
        userElement.textContent = e.user + " : " ;

        var messageElement = document.createElement('span');
        messageElement.classList.add('message');
        messageElement.textContent = e.message;

        // Append user and message elements to the message container
        messageContainer.appendChild(userElement);
        messageContainer.appendChild(messageElement);

        // Append the message container to the maincontainer
        var mainContainer = document.querySelector('.maincontainer');
        mainContainer.appendChild(messageContainer);
    });



const cards = document.querySelectorAll('.card');
        const joinButton = document.querySelector('.join-button');
        
        function updateButtonText(type) {
            joinButton.textContent = type === 'client' ? 'Join as a Client' : 'Join as a Freelancer';
        }

        function selectCard(selectedCard) {
            cards.forEach(card => {
                card.classList.remove('selected');
            });
            
            selectedCard.classList.add('selected');
            
            joinButton.classList.add('active');
            
            updateButtonText(selectedCard.dataset.type);
        }

        cards.forEach(card => {
            card.addEventListener('click', () => {
                selectCard(card);
            });
        });

        joinButton.classList.remove('active');
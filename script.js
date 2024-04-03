document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('comment-form');
    const commentsList = document.getElementById('comments-list');
  
    form.addEventListener('submit', function(event) {
      event.preventDefault();
  
      const nameInput = document.getElementById('name');
      const commentInput = document.getElementById('comment');
  
      const name = nameInput.value.trim();
      const comment = commentInput.value.trim();
  
      if (name === '' || comment === '') {
        alert('Please fill in all fields.');
        return;
      }
  
      addComment(name, comment);
  
      // Reset form inputs
      nameInput.value = '';
      commentInput.value = '';
    });
  
    function addComment(name, comment) {
      const li = document.createElement('li');
      li.innerHTML = `
        <div class="comment">
          <div class="comment-author">${name}</div>
          <div class="comment-text">${comment}</div>
        </div>
      `;
      commentsList.appendChild(li);
    }
  });
  
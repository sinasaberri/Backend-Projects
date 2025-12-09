document.addEventListener('DOMContentLoaded', async () => {
  const usersList = document.getElementById('usersList');
  const messageEl = document.getElementById('message');

  try {
    const res = await fetch('api/users.php');
    const data = await res.json();

    if (data.success) {
      usersList.innerHTML = data.users.map(user => `
        <tr>
          <td>${user.username}</td>
          <td>${user.email}</td>
          <td>${new Date(user.created_at).toLocaleDateString()}</td>
        </tr>
      `).join('');
    } else {
      throw new Error(data.message || 'Failed to load users.');
    }
  } catch (err) {
    messageEl.textContent = err.message;
    messageEl.className = 'message error';
  }
});
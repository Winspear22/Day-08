document.addEventListener('DOMContentLoaded', () => 
	{
		const btn = document.getElementById('load-quote');
		const container = document.getElementById('quote-container');
		if (!btn || !container)
			return;
		btn.addEventListener('click', () =>
			{
				fetch('/quote', { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
				.then(res => 
				{
					if (!res.ok)
						throw new Error('Erreur réseau');
					return res.json();
				})
				.then(data => {
					container.textContent = data.quote;
				})
				.catch(err => {
					container.textContent = err.message;
				});
			});
		});

const fields = {
  kt: document.getElementById('kotatanggal'), 
  sa: document.getElementById('sub'), 
  paragraph1: document.getElementById('p1'),
  paragraph2: document.getElementById('p2'),
  paragraph3: document.getElementById('p3'),
  nama: document.getElementById('name'),
};

const save = document.getElementById('save'); 
const nextBtn = document.getElementById('nextBtn'); 


function nl2br(text) {
  return text ? text.replace(/\n/g, '<br>') : '';
}

function updatePreview() {
  preview.innerHTML = `
    <div class="preview-kota-tanggal">
      ${fields.kt.value || 'City, Date'}
    </div>
    <p><strong>Subject: </strong> ${fields.sa.value || ''}</p> 
    <div class="preview-paragraph">
      ${nl2br(fields.paragraph1.value || 
        '...')}
    </div>
    <div class="preview-paragraph">
      ${nl2br(fields.paragraph2.value || 
        '...')}
    </div>
    <div class="preview-paragraph">
      ${nl2br(fields.paragraph3.value || 
        '...')}
    </div>
    <div class="preview-penutup">
      ${nl2br(fields.paragraph3.value || 'Sincerely,')}<br><br>
      <strong>${fields.nama.value || 'Your Name'}</strong>
    </div>
  `;
}





function validateFlow() { 
  const isFilled =
    fields.kt.value.trim() ||
    fields.sa.value.trim() ||
    fields.paragraph1.value.trim() ||
    fields.paragraph2.value.trim() ||
    fields.paragraph3.value.trim();

  nextBtn.disabled = !isFilled;
}


function nextStep() { //clear form
  Object.values(fields).forEach(field => field.value = '');
  updatePreview();
  validateFlow();
}


//save data
function prevStep() {
  updatePreview();
}

   //live update
document.addEventListener('input', () => {
  updatePreview();
  validateFlow();
});
updatePreview();
validateFlow();
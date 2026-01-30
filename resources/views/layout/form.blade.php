        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <title>Riyadh | Seleksi</title>
        <link rel="stylesheet" href="{{ asset('assets/css/script.css') }}">
        <style>
        body { margin:0; font-family: Arial, sans-serif; background:#f2f4f7;}
        .container { display:flex; height:100vh; }
        .form-panel { width:40%; background:#fff; padding:20px; border-right:2px solid #ddd; overflow-y:auto;}
        .preview-panel { width:60%; background:#eee; padding:30px; overflow-y:auto;}
        label { display:block; margin-top:10px; font-weight:bold;}
        input, textarea { width:100%; padding:8px; margin-top:4px;}
        button { margin-top:15px; padding:10px; width:48%; }
        .preview-box { background:white; padding:40px; min-height:90%; font-family:"Times New Roman", serif;}
        </style>
        </head>

        <body>

        <div class="container">

        <!-- FORM -->
        <div class="form-panel">
            <h2>Form Input</h2>

            <label>Kota & Tanggal</label>
            <input type="text" id="kotatanggal">

            <label>Subject</label>
            <input type="text" id="sub">

            <label>Paragraph 1</label>
            <textarea id="p1"></textarea>

            <label>Paragraph 2</label>
            <textarea id="p2"></textarea>

            <label>Paragraph 3</label>
            <textarea id="p3"></textarea>

            <label>Nama</label>
            <input type="text" id="name">

       <div style="display:flex; justify-content:space-between; gap:10px;">
  <button class="btn btn-save" onclick="saveData()">Save</button>
  <button class="btn btn-print" onclick="printLetter()">Print</button>
  <button class="btn btn-clear" onclick="clearForm()">Clear</button>
</div>


        </div>

        <!-- PREVIEW -->
        <div class="preview-panel">
            <div id="preview" class="preview-box"></div>
        </div>

        </div>

        <script>
        /* === JS kamu === */
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
        const preview = document.getElementById('preview');

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
            ${nl2br(fields.paragraph1.value || 'Isi paragraf pertama')}
            </div>
            <div class="preview-paragraph">
            ${nl2br(fields.paragraph2.value || 'Isi paragraf kedua')}
            </div>
            <div class="preview-paragraph">
            ${nl2br(fields.paragraph3.value || 'Isi paragraf ketiga')}
            </div>
            <div class="preview-penutup">
            Sincerely,<br><br>
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

        function nextStep() {
        Object.values(fields).forEach(field => field.value = '');
        updatePreview();
        validateFlow();
        }

        function prevStep() {
        updatePreview();
        }

        document.addEventListener('input', () => {
        updatePreview();
        validateFlow();
        });

        updatePreview();
        validateFlow();
        </script>

        </body>
        </html>

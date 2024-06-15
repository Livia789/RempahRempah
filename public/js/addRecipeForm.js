function addTool() {
    const section = document.getElementById('toolSection');
    const containerIdx = section.getElementsByClassName('toolContainer').length;

    const newContainer = document.createElement('div');
    newContainer.className = 'toolContainer';
    newContainer.setAttribute('data-index', containerIdx);
    let newInnerHTML = `
        <label for="tool${containerIdx}">Alat*</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control textField whiteBackground" placeholder="Masukan nama alat" name="tool[${containerIdx}]" id="tool${containerIdx}">
            <button type="button" class="sharpBox delete-tool" onclick="deleteTool(${containerIdx})"><i class="fa fa-trash"></i> &ensp;Hapus alat</button>
        </div>
    `;
    newContainer.innerHTML = newInnerHTML;
    section.appendChild(newContainer);

    const containers = section.querySelectorAll('.toolContainer');
    var deleteButton = containers[0].getElementsByClassName('delete-tool')[0];
    deleteButton.disabled = false;
    deleteButton.classList.remove('disabled');
}

function deleteTool(containerIdx) {
    const container = document.querySelector(`.toolContainer[data-index="${containerIdx}"]`);
    container.remove();

    const containers = document.querySelectorAll('.toolContainer');
    containers.forEach((container, idx) => {
        container.setAttribute('data-index', idx);

        let label = container.querySelector('label');
        label.htmlFor = `tool${idx}`;

        let input = container.querySelector('input');
        input.name = `tool[${idx}]`;
        input.id = `tool${idx}`;

        let deleteButton = container.querySelector('.delete-tool');
        deleteButton.setAttribute('onclick', `deleteTool(${idx})`);
    });

    let deleteButton = containers[0].getElementsByClassName('delete-tool')[0];
    if (containers.length === 1) {
        deleteButton.disabled = true;
        deleteButton.classList.add('disabled');
    } else {
        deleteButton.disabled = false;
        deleteButton.classList.remove('disabled');
    }
}

function addHeader(type) {
    if (type == 'ingredient') {
        var typeLabel = 'bahan';
    } else {
        var typeLabel = 'langkah';
    }

    const section = document.getElementById(type+'Section');
    const headerIdx = section.getElementsByClassName(type+'Header').length;

    const newHeader = document.createElement('div');
    newHeader.className = type+'Header';
    newHeader.setAttribute('data-header-index', headerIdx);
    let newInnerHTML = `
        <label for="${type}Header${headerIdx}">Header ${typeLabel}*</label>
        <input type="text" class="form-control textField whiteBackground" placeholder="Masukan nama ${typeLabel} bahan" name="${type}Header[${headerIdx}]" id="${type}Header${headerIdx}">
        <div class="${type}Description" data-description-index="0">
    `;
    if (type == 'step') {
        newInnerHTML += `
            <div class="stepCounter">Langkah 1</div>
            <label for="stepDescription${headerIdx}_0">Deskripsi langkah*</label>
            <div class="descriptionContainer">
                <div class="input-group mb-3">
                    <textarea class="form-control textField whiteBackground" placeholder="Masukan deskripsi langkah" name="stepDescription[${headerIdx}][0]" id="stepDescription${headerIdx}_0"></textarea>
                    <button type="button" class="sharpBox delete-description disabled" onclick="deleteDescription('step', ${headerIdx}, 0)" disabled><i class="fa fa-trash"></i> &ensp;Hapus langkah</button>
                </div>
            </div>
            <div class="col">
                <label for="stepImg${headerIdx}_0" class="form-label">Foto langkah</label>
                <input type="file" name="stepImg[${headerIdx}][0]" id="stepImg${headerIdx}_0" onchange="showFileName(this)" hidden>
                <div class="d-flex justify-content-start" id="typeSection">
                    <button type="button" class="sharpBox" onclick="document.getElementById('stepImg${headerIdx}_0').click()">
                        <img src="/assets/icons/cloud_save.png" class="picon" alt="save_icon">
                        Unggah
                    </button>
                    <span id="fileName_stepImg${headerIdx}_0" class="fileName"></span>
                </div>
            </div>
        `;
    } else {
        newInnerHTML += `
            <div class="input-group mb-3 descriptionContainer">
                <div class="ingredientDescriptionContainer">
                    <label for="ingredientDescription${headerIdx}_0">Bahan*</label>
                    <input type="text" class="form-control textField whiteBackground" placeholder="Masukan nama bahan" name="ingredientDescription[${headerIdx}][0]" id="ingredientDescription${headerIdx}_0">
                </div>
                <div class="ingredientDescriptionContainer sub">
                    <label for="ingredientQty${headerIdx}_0">Jumlah*</label>
                    <input type="text" class="form-control textField whiteBackground" placeholder="Masukan jumlah bahan" name="ingredientQty[${headerIdx}][0]" id="ingredientQty${headerIdx}_0">
                </div>
                <div class="ingredientDescriptionContainer sub">
                    <label for="ingredientUnit${headerIdx}_0">Satuan</label>
                    <input type="text" class="form-control textField whiteBackground" placeholder="Masukan satuan bahan" name="ingredientUnit[${headerIdx}][0]" id="ingredientUnit${headerIdx}_0">
                </div>
                <button type="button" class="sharpBox delete-description disabled" onclick="deleteDescription('ingredient', 0, 0)" disabled><i class="fa fa-trash"></i> &ensp;Hapus bahan</button>
            </div>
        `;
    }
    newInnerHTML += `
        </div>
        <button type="button" class="sharpBox add-description" onclick="addDescription('${type}', ${headerIdx})"><i class="fa fa-plus"></i> &ensp;Tambah ${typeLabel}</button>
        <button type="button" class="sharpBox delete-header" onclick="deleteHeader('${type}', ${headerIdx})"><i class="fa fa-trash"></i> &ensp;Hapus header ${typeLabel}</button>
    `;
    newHeader.innerHTML = newInnerHTML;
    section.appendChild(newHeader);

    const headers = document.querySelectorAll('.'+type+'Header');
    var deleteButton = headers[0].getElementsByClassName('delete-header')[0];
    deleteButton.disabled = false;
    deleteButton.classList.remove('disabled');
}

function deleteHeader(type, headerIdx) {
    const header = document.querySelector(`.${type}Header[data-header-index="${headerIdx}"]`);
    header.remove();

    const headers = document.querySelectorAll('.'+type+'Header');
    headers.forEach((header, idx) => {
        header.setAttribute('data-header-index', idx);

        let label = header.querySelector('label');
        label.htmlFor = `${type}Header${idx}`;

        let input = header.querySelector('input');
        input.name = `${type}Header[${idx}]`;
        input.id = `${type}Header${idx}`;

        let addButton = header.querySelector('.add-description');
        addButton.setAttribute('onclick', `addDescription('${type}', ${idx})`);

        let deleteButton = header.querySelector('.delete-header');
        deleteButton.setAttribute('onclick', `deleteHeader('${type}', ${idx})`);

        let descriptions = header.querySelectorAll('.'+type+'Description');
        descriptions.forEach((description, idx2) => {
            description.setAttribute('data-description-index', idx2);

            if (type == 'step') {
                label = description.querySelector('label');
                label.htmlFor = `stepDescription${idx}_${idx2}`;

                textarea = description.querySelector('textarea');
                textarea.name = `stepDescription[${idx}][${idx2}]`;
                textarea.id = `stepDescription${idx}_${idx2}`;

                deleteButton = description.querySelector('.delete-description');
                deleteButton.setAttribute('onclick', `deleteDescription('step', ${idx}, ${idx2})`);

                let col = description.querySelector('.col');

                label = col.querySelector('label');
                label.htmlFor = `stepImg${idx}_${idx2}`;

                input = col.querySelector('input');
                input.name = `stepImg[${idx}][${idx2}]`;
                input.id = `stepImg${idx}_${idx2}`;

                deleteButton = col.querySelector('button');
                deleteButton.setAttribute('onclick', `document.getElementById('stepImg${idx}_${idx2}').click()`);

                let span = col.querySelector('span');
                span.id = `fileName_stepImg${idx}_${idx2}`;
            } else {
                let labels = description.querySelectorAll('label');
                labels.forEach((label, ctr) => {
                    let suffix = ctr === 0 ? 'Description' : (ctr === 1 ? 'Qty' : 'Unit');
                    label.htmlFor = `ingredient${suffix}${idx}_${idx2}`;
                });

                let inputs = description.querySelectorAll('input');
                inputs.forEach((input, ctr) => {
                    let suffix = ctr === 0 ? 'Description' : (ctr === 1 ? 'Qty' : 'Unit');
                    input.name = `ingredient${suffix}[${idx}][${idx2}]`;
                    input.id = `ingredient${suffix}${idx}_${idx2}`;
                });

                deleteButton = description.querySelector('.delete-description');
                deleteButton.setAttribute('onclick', `deleteDescription('ingredient', ${idx}, ${idx2})`);
            }
        });
    });

    let deleteButton = headers[0].getElementsByClassName('delete-header')[0];
    if (headers.length === 1) {
        deleteButton.disabled = true;
        deleteButton.classList.add('disabled');
    } else {
        deleteButton.disabled = false;
        deleteButton.classList.remove('disabled');
    }
}

function addDescription(type, headerIdx) {
    if (type == 'ingredient') {
        var typeLabel = 'bahan';
    } else {
        var typeLabel = 'langkah';
    }

    const header = document.querySelector(`.${type}Header[data-header-index="${headerIdx}"]`);
    const descriptionIdx = header.getElementsByClassName(type+'Description').length;

    const newDescription = document.createElement('div');
    newDescription.className = type+'Description';
    newDescription.setAttribute('data-description-index', descriptionIdx);

    let newInnerHTML = '';
    if (type == 'step') {
        newInnerHTML += `
            <div class="stepCounter">Langkah ${descriptionIdx + 1}</div>
            <label for="stepDescription${headerIdx}_${descriptionIdx}">Deskripsi langkah*</label>
            <div class="descriptionContainer">
                <div class="input-group mb-3">
                    <textarea class="form-control textField whiteBackground" placeholder="Masukan deskripsi langkah" name="stepDescription[${headerIdx}][${descriptionIdx}]" id="stepDescription${headerIdx}_${descriptionIdx}"></textarea>
                    <button type="button" class="sharpBox delete-description" onclick="deleteDescription('step', ${headerIdx}, ${descriptionIdx})"><i class="fa fa-trash"></i> &ensp;Hapus langkah</button>
                </div>
            </div>
            <div class="col">
                <label for="stepImg${headerIdx}_${descriptionIdx}" class="form-label">Foto langkah</label>
                <input type="file" name="stepImg[${headerIdx}][${descriptionIdx}]" id="stepImg${headerIdx}_${descriptionIdx}" onchange="showFileName(this)" hidden>
                <div class="d-flex justify-content-start" id="typeSection">
                    <button type="button" class="sharpBox" onclick="document.getElementById('stepImg${headerIdx}_${descriptionIdx}').click()">
                    <img src="/assets/icons/cloud_save.png" class="picon" alt="save_icon">
                        Unggah
                    </button>
                    <span id="fileName_stepImg${headerIdx}_${descriptionIdx}" class="fileName"></span>
                </div>
            </div>
        `;
    } else {
        newInnerHTML += `
            <div class="input-group mb-3 descriptionContainer">
                <div class="ingredientDescriptionContainer">
                    <label for="ingredientDescription${headerIdx}_${descriptionIdx}">Bahan*</label>
                    <input type="text" class="form-control textField whiteBackground" placeholder="Masukan nama bahan" name="ingredientDescription[${headerIdx}][${descriptionIdx}]" id="ingredientDescription${headerIdx}_${descriptionIdx}">
                </div>
                <div class="ingredientDescriptionContainer sub">
                    <label for="ingredientQty${headerIdx}_${descriptionIdx}">Jumlah*</label>
                    <input type="text" class="form-control textField whiteBackground" placeholder="Masukan jumlah bahan" name="ingredientQty[${headerIdx}][${descriptionIdx}]" id="ingredientQty${headerIdx}_${descriptionIdx}">
                </div>
                <div class="ingredientDescriptionContainer sub">
                    <label for="ingredientUnit${headerIdx}_${descriptionIdx}">Satuan</label>
                    <input type="text" class="form-control textField whiteBackground" placeholder="Masukan satuan bahan" name="ingredientUnit[${headerIdx}][${descriptionIdx}]" id="ingredientUnit${headerIdx}_${descriptionIdx}">
                </div>
                <button type="button" class="sharpBox delete-description" onclick="deleteDescription('ingredient', ${headerIdx}, ${descriptionIdx})"><i class="fa fa-trash"></i> &ensp;Hapus bahan</button>
            </div>
        `;
    }
    newDescription.innerHTML = newInnerHTML;
    header.insertBefore(newDescription, header.querySelector('.add-description'));

    const descriptions = header.querySelectorAll('.'+type+'Description');
    var deleteButton = descriptions[0].getElementsByClassName('delete-description')[0];
    deleteButton.disabled = false;
    deleteButton.classList.remove('disabled');
}

function deleteDescription(type, headerIdx, descriptionIdx) {
    const header = document.querySelector(`.${type}Header[data-header-index="${headerIdx}"]`);
    const description = header.querySelector(`.${type}Description[data-description-index="${descriptionIdx}"]`);
    description.remove();

    const descriptions = header.querySelectorAll('.'+type+'Description');
    descriptions.forEach((description, idx) => {
        description.setAttribute('data-description-index', idx);
        if (type == 'step') {
            let label = description.querySelector('label');
            label.htmlFor = `stepDescription${headerIdx}_${idx}`;

            let textarea = description.querySelector('textarea');
            textarea.name = `stepDescription[${headerIdx}][${idx}]`;
            textarea.id = `stepDescription${headerIdx}_${idx}`;

            let deleteButton = description.querySelector('.delete-description');
            deleteButton.setAttribute('onclick', `deleteDescription('step', ${headerIdx}, ${idx})`);

            let col = description.querySelector('.col');

            label = col.querySelector('label');
            label.htmlFor = `stepImg${headerIdx}_${idx}`;

            input = col.querySelector('input');
            input.name = `stepImg[${headerIdx}][${idx}]`;
            input.id = `stepImg${headerIdx}_${idx}`;

            deleteButton = col.querySelector('button');
            deleteButton.setAttribute('onclick', `document.getElementById('stepImg${headerIdx}_${idx}').click()`);

            let span = col.querySelector('span');
            span.id = `fileName_stepImg${headerIdx}_${idx}`;
        } else {
            let labels = description.querySelectorAll('label');
            labels.forEach((label, ctr) => {
                let suffix = ctr === 0 ? 'Description' : (ctr === 1 ? 'Qty' : 'Unit');
                label.htmlFor = `ingredient${suffix}${headerIdx}_${idx}`;
            });

            let inputs = description.querySelectorAll('input');
            inputs.forEach((input, ctr) => {
                let suffix = ctr === 0 ? 'Description' : (ctr === 1 ? 'Qty' : 'Unit');
                input.name = `ingredient${suffix}[${headerIdx}][${idx}]`;
                input.id = `ingredient${suffix}${headerIdx}_${idx}`;
            });

            let deleteButton = description.querySelector('.delete-description');
            deleteButton.setAttribute('onclick', `deleteDescription('ingredient', ${headerIdx}, ${idx})`);
        }
    });

    var deleteButton = descriptions[0].getElementsByClassName('delete-description')[0];
    if (descriptions.length === 1) {
        deleteButton.disabled = true;
        deleteButton.classList.add('disabled');
    } else {
        deleteButton.disabled = false;
        deleteButton.classList.remove('disabled');
    }
}

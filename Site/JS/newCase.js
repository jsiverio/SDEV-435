const masterEvidenceBlock = document.getElementById('evidenceBlock1');
const evidenceDiv = document.getElementById('evidence');
const authority = document.getElementById('authority');
const swNumber = document.getElementById('swNumber');

let evidenceCounter = 1;
authority.addEventListener('change', function(){
    if(authority.value === '1'){
        swNumber.disabled = false;
    }else{
        swNumber.disabled = true;
    }
});







function addEvidenceBlock(){
    evidenceCounter++;
    const newEvidenceBlock = new CaseBlock(masterEvidenceBlock, evidenceCounter);
    evidenceDiv.appendChild(newEvidenceBlock.newBlock());
}
function removeEvidenceBlock(element){
    if(evidenceCounter > 1){
        const evidenceBlockToBeRemoved = element.parentNode.parentNode.parentNode;
        evidenceBlockToBeRemoved.remove();
        evidenceCounter--;
    }
}
function clearInputs(element){
    const inputs = element.parentNode.parentNode.querySelectorAll('input');
    inputs.forEach(input => input.value = '');
}




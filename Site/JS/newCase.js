const masterEvidenceBlock = document.getElementById('evidenceBlock1');
const evidenceDiv = document.getElementById('evidence');
let evidenceCounter = 1;

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




//Declaration
class CaseBlock {
    constructor(block, id) {
        this.block = block;
        this.id = id;
    }
    //Method
    newBlock() {
       let newBlock = this.block.cloneNode(true);
       let buttons = newBlock.querySelectorAll('.btn-light'); 
       
       //Modify the childnodes
       newBlock.id = "evidenceBlock" + this.id;
       newBlock.style.marginTop = "32px";
       newBlock.children[0].children[0].childNodes[2].id = "evidenceNumber" + this.id;
       newBlock.children[0].children[1].childNodes[2].id = "deviceType" + this.id;
       newBlock.children[0].children[2].childNodes[2].id = "evidenceSize" + this.id;
       newBlock.children[0].children[3].childNodes[2].id = "evidenceNotes" + this.id;
       newBlock.children[0].children[0].childNodes[2].value = "";
       newBlock.children[0].children[2].childNodes[2].value = "";
       newBlock.children[0].children[3].childNodes[2].value = "";         
       //Show the remove button
       buttons[1].style.display = "inline-block";
       
       return newBlock;
    }
    


}

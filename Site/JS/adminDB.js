/*---------------------------------------------------------------------------------------------------------------------
File: adminDB.js
Written by: Jorge Siverio 2024
Description: Form Validation for admin database edit page
---------------------------------------------------------------------------------------------------------------------*/

const agencyEditInput = document.getElementById('agencyEdit')
const agencyEditSelection = document.getElementById('agencyEditSelection')

agencyEditSelection.addEventListener('change', () => {
  agencyEditInput.value = agencyEditSelection[agencyEditSelection.selectedIndex].text
});

const offenseEditInput = document.getElementById('offenseEdit')
const offenseEditSelection = document.getElementById('offenseEditSelection')

offenseEditSelection.addEventListener('change', () => {
    offenseEditInput.value = offenseEditSelection[offenseEditSelection.selectedIndex].text
    });

const evidenceEditInput = document.getElementById('evidenceEdit')
const evidenceEditSelection = document.getElementById('evidenceEditSelection')

evidenceEditSelection.addEventListener('change', () => {
    evidenceEditInput.value = evidenceEditSelection[evidenceEditSelection.selectedIndex].text
    });   
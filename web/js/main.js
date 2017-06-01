
/*****************************SUBJECT FUNCTIONS********************************/


function deleteSubject(subjectID) {
  if (isNaN(parseInt(subjectID))) {
    throw new Error('Invalid subject!');
  }
  $.ajax({
      url: '/deletesubject/' + subjectID,
      method: 'POST',
      success: function() {
        $('#subject' + subjectID).remove();
      },
      error: function(response) {
        alert('Could not delete subject!');
      }
  });
}

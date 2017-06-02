
/*****************************SUBJECT FUNCTIONS********************************/


function deleteSubject(subjectID) {
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

function toggleSubjectEditable(subjectID) {
  var $subject = $('#subject' + subjectID);
  if ($subject.find('input').first().prop('disabled') === true) {
    $subject.find('.edit-button').text('save');
    $subject.find('input').prop('disabled', false);
  }
  else {
    editSubject(subjectID);
    $subject.find('input').prop('disabled', true);
    $subject.find('.edit-button').text('edit');
  }
}


function editSubject(subjectID) {
  if (isNaN(parseInt(subjectID))) {
    throw new Error('Invalid subject!');
  }
  var $subject = $('#subject' + subjectID + ' form').serialize();
  $.ajax({
      url: '/editsubject/' + subjectID,
      method: 'POST',
      data: $('#subject' + subjectID + ' form').serialize(),
      success: function() {
        alert('Updated!');
      },
      error: function(response) {
        alert('Could not edit subject!');
      }
  });
  return false;
}

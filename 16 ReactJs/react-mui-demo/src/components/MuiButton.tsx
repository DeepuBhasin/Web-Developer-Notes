import React, { useState } from 'react'
import {TextField,Stack} from '@mui/material'
function MuiButton() {
    return (
    <Stack spacing={4}>
      <Stack spacing={2} direction='row'>
        <TextField label='Name' value='test'/>
      </Stack>
    </Stack>
  )
}

export default MuiButton
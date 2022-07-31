import React from 'react'
import Navbar from './component/Navbar'
import { Routes, Route } from 'react-router-dom'
import Login from './Pages/Login'
import Footer from './component/Footer'
import Container from './component/Container'

function App() {
  return (
    <>
      <Navbar />
      <Container>
        <Routes>
          <Route path='/login' element={<Login />} />
        </Routes>
      </Container>
      <Footer />
    </>
  )
}

export default App
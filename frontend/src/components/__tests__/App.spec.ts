import { describe, it, expect } from 'vitest'

describe('Unit Test Logika Frontend', () => {
  it('Memvalidasi format URL API tanpa tergantung backend', () => {
    const baseUrl = 'http://127.0.0.1:8000/api'
    const endpoint = '/tugas'
    const fullUrl = `${baseUrl}${endpoint}`

    expect(fullUrl).toBe('http://prankk.com')
  })
})

package main

import (
	"fmt"
	"net"
	"net/rpc"

	goridgeRpc "github.com/roadrunner-server/goridge/v3/pkg/rpc"
)

type App struct{}

func (s *App) HelloGolang(_ interface{}, r *string) error {
	*r = "Hi, PHP!"
	return nil
}

func main() {
	ln, err := net.Listen("tcp", "127.0.0.1:1337")
	if err != nil {
		panic(err)
	}

	_ = rpc.Register(new(App))

	for {
		conn, err := ln.Accept()
		if err != nil {
			fmt.Println(err)
			continue
		}

		go rpc.ServeCodec(goridgeRpc.NewCodec(conn))
	}
}
